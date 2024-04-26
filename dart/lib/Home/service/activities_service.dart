import 'package:chuva_dart/data/exceptions/exceptions.dart';
import 'dart:convert';
import 'package:chuva_dart/data/models/activities.dart';
import 'package:dio/dio.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:intl/intl.dart';

abstract class IActivitiesService{
  Future<List<Activities>> getActivities();
  List<Activities> filterActivitiesByDay(int day);
  bool isEmpty();
}
class ActivitiesService implements IActivitiesService {
  ValueNotifier<List<Activities>> activities = ValueNotifier<List<Activities>>([]);

  ///todo CRUD de activities e feita no repo
  @override
  Future<List<Activities>> getActivities() async {
    var dio = Dio();
    String initialUrl = "https://raw.githubusercontent.com/chuva-inc/exercicios-2023/master/dart/assets/activities.json";
    return await _fetchActivities(dio, initialUrl);
  }

  Future<List<Activities>> _fetchActivities(Dio dio, String url) async {
    final response = await dio.get(url);

    if (response.statusCode == 200) {
      Map<String, dynamic> dataMap = jsonDecode(response.data);
      _addActivities(response, dataMap);
      final nextPageUrl = dataMap['links']['next'];
      if (nextPageUrl != null) {
        return await _fetchActivities(dio, nextPageUrl);
      }
      return activities.value;
    } else if (response.statusCode == 404) {
      throw NotFoundException("A url informada não é válida");
    } else {
      throw Exception("Não foi possível carregar as activities");
    }
  }

  //todo passar pro repo
  void _addActivities(Response response, Map<String, dynamic> dataMap) {
    final dataList = dataMap['data'] as List;
    activities.value.addAll(dataList.map((dataItem) => Activities.fromJson(dataItem)));
  }

  @override
  bool isEmpty(){
    return activities.value.isEmpty;
  }

  @override
  List<Activities> filterActivitiesByDay(int day){
    return activities.value.where((activities) => (_convertDate(activities.start!)== "$day") && (_convertDate(activities.end!) == "$day")).toList();
  }

  String _convertDate(String date){
    return DateFormat.d().format(DateTime.parse(date).toUtc().subtract(const Duration(hours: 3)));
  }
}