

import 'dart:convert';

import 'package:chuva_dart/Home/service/Activities_service.dart';
import 'package:chuva_dart/data/models/activities.dart';


abstract class IActivitiesController{
  Future<List<Activities>> getActivities();
}

class ActivitiesController implements IActivitiesController{
  ActivitiesService activitiesService = ActivitiesService();

  @override
  Future<List<Activities>> getActivities() async {
    return  activitiesService.getActivities();
  }

}