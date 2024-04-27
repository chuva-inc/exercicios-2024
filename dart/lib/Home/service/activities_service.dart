import 'package:chuva_dart/data/exceptions/exceptions.dart';
import 'dart:convert';
import 'package:chuva_dart/data/models/activities.dart';
import 'package:dio/dio.dart';
import 'package:intl/intl.dart';

import '../../data/repositories/activities_repository.dart';

abstract class IActivitiesService{
  Future<List<Activities>> getActivities();
  List<Activities> filterActivitiesByDay(int day);
  List<Activities> getFavorites();
  void toggleFavorite(int id);
  bool isEmpty();
}

class ActivitiesService implements IActivitiesService {
  List<Activities> activities = [];
  ActivitiesRepository repository = ActivitiesRepository();



  ActivitiesService();

  @override
  List<Activities> getFavorites(){
    return repository.favorites;
  }

  @override
  void toggleFavorite(int id){
    repository.toggleFavorite(id);
  }

  @override
  Future<List<Activities>> getActivities() async {
    var dio = Dio();
    String initialUrl = "https://raw.githubusercontent.com/chuva-inc/exercicios-2023/master/dart/assets/activities.json";
    return await _fetchActivities(dio, initialUrl);
  }

  @override
  bool isEmpty(){
    return repository.isEmpty();
  }

  Future<List<Activities>> _fetchActivities(Dio dio, String url) async {
    final response = await dio.get(url);

    if (response.statusCode == 200) {
      Map<String, dynamic> dataMap = jsonDecode(response.data);
      _addActivitiesToRepo(dataMap);
      final nextPageUrl = dataMap['links']['next'];
      if (nextPageUrl != null) {
        return await _fetchActivities(dio, nextPageUrl);
      }
      return activities;
    } else if (response.statusCode == 404) {
      throw NotFoundException("A url informada não é válida");
    } else {
      throw Exception("Não foi possível carregar as activities");
    }
  }

  void _addActivitiesToRepo(Map<String, dynamic> dataMap) {
    final dataList = dataMap['data'] as List;
    final List<Activities> fetchedActivities = dataList.map((dataItem) => Activities.fromJson(dataItem)).toList();
    repository.saveAll(fetchedActivities);
    activities = repository.activities;
  }

  @override
  List<Activities> filterActivitiesByDay(int day){
    return activities.where((activity) => (_convertDate(activity.start!)== "$day") && (_convertDate(activity.end!) == "$day")).toList();
  }

  String _convertDate(String date){
    return DateFormat.d().format(DateTime.parse(date).toUtc().subtract(const Duration(hours: 3)));
  }


}