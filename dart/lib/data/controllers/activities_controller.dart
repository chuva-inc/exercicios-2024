
import 'dart:collection';

import 'package:chuva_dart/data/models/activities.dart';
import 'package:chuva_dart/data/service/activities_service.dart';

import '../models/person.dart';


abstract class IActivitiesController{
  Future<List<Activities>> getActivities();
  List<Activities> filterActivitiesByDay(int day);
  bool isEmpty();
  void toggleFavorite(int id);
  String formatActivityTime(String start, String end);
  String convertDate(String date);
  String extractTextFromHtml(String htmlString);
  String formatSpeakers(List<Person> people);
  Map<int, List<Activities>> getAllGroupedActivities ();
  String formatData(String data);
}

class ActivitiesController implements IActivitiesController{
  ActivitiesService activitiesService = ActivitiesService();

  @override
  Future<List<Activities>> getActivities() async {
    return  activitiesService.getActivities();
  }

  @override
  List<Activities> filterActivitiesByDay(int day){
    return activitiesService.filterActivitiesByDay(day);
  }

  @override
  bool isEmpty(){
    return activitiesService.isEmpty();
  }

  @override
  void toggleFavorite(int id){
    activitiesService.toggleFavorite(id);
  }

  @override
  String convertDate(String date) {
    return activitiesService.convertDate(date);
  }

  @override
  String extractTextFromHtml(String htmlString) {
    return activitiesService.extractTextFromHtml(htmlString);
  }

  @override
  String formatActivityTime(String start, String end) {
    return activitiesService.formatActivityTime(start, end);
  }

  @override
  String formatSpeakers(List<Person> people) {
   return activitiesService.formatSpeakers(people);
  }

  @override
  Map<int, List<Activities>> getAllGroupedActivities() {
   return activitiesService.getAllGroupedActivities();
  }

  @override
  String formatData(String data) {
    return activitiesService.formatData(data);
  }



}