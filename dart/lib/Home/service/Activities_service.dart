


import 'dart:convert';

import 'package:chuva_dart/data/exceptions/exceptions.dart';
import 'package:chuva_dart/data/models/activities.dart';
import 'package:dio/dio.dart';
import 'package:flutter/cupertino.dart';

abstract class IActivitiesService{
  Future<List<Activities>> getActivities();
}
class ActivitiesService extends ChangeNotifier implements IActivitiesService {
  List<Activities> activities = [];

  @override
  Future<List<Activities>> getActivities() async {
    var dio = Dio();

    final response = await dio.get("https://raw.githubusercontent.com/chuva-inc/exercicios-2023/master/dart/assets/activities.json");

    if (response.statusCode == 200) {

      // Map<String, dynamic> dataMap = jsonDecode(response.data);
      // final dataList = dataMap['data'];
      //
      // late List<Activities> activities = [];
      // for (var dataItem in dataList) {
      //   activities.add(Activities.fromJson(dataItem));
      // }

      return addActivities(response);

    } else if (response.statusCode == 404) {
      throw NotFoundException("A url informada não é válida");
    } else {
      throw Exception("Não foi possível carregar as activities");
    }
  }

  List<Activities> addActivities(Response response){
    Map<String, dynamic> dataMap = jsonDecode(response.data);
    final dataList = dataMap['data'];

    for (var dataItem in dataList) {
      activities.add(Activities.fromJson(dataItem));
    }
    return activities;
  }
}