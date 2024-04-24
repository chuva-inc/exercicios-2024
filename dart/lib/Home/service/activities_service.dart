import 'package:chuva_dart/data/exceptions/exceptions.dart';
import 'dart:convert';
import 'package:chuva_dart/data/models/activities.dart';
import 'package:dio/dio.dart';
import 'package:intl/intl.dart';

abstract class IActivitiesService{
  Future<List<Activities>> getActivities(int day);
}
class ActivitiesService implements IActivitiesService {
  List<Activities> activities = [];

  @override
  Future<List<Activities>> getActivities(int day) async {
    var dio = Dio();
    String initialUrl = "https://raw.githubusercontent.com/chuva-inc/exercicios-2023/master/dart/assets/activities.json";
    return await fetchActivities(dio, initialUrl, day);
  }

  Future<List<Activities>> fetchActivities(Dio dio, String url, int day) async {
    final response = await dio.get(url);

    if (response.statusCode == 200) {
      Map<String, dynamic> dataMap = jsonDecode(response.data);
      addActivities(response, dataMap, day);
      final nextPageUrl = dataMap['links']['next'];
      if (nextPageUrl != null) {
        return await fetchActivities(dio, nextPageUrl, day);
      }
      return activities;
    } else if (response.statusCode == 404) {
      throw NotFoundException("A url informada não é válida");
    } else {
      throw Exception("Não foi possível carregar as activities");
    }
  }

  void addActivities(Response response, Map<String, dynamic> dataMap, int day) {
    final dataList = dataMap['data'] as List;
    activities.addAll(dataList.map((dataItem) => Activities.fromJson(dataItem)).toList().where((activitie) => (convertDate(activitie.start!)== "$day") && (convertDate(activitie.end!) == "$day")));
  }

  String convertDate(String date){
    return DateFormat.d().format(DateTime.parse(date).toUtc().subtract(const Duration(hours: 3)));
  }
}