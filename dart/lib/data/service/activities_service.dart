

import 'dart:collection';

import 'package:html/dom.dart';
import 'package:html/parser.dart' show parse;

import 'package:chuva_dart/data/exceptions/exceptions.dart';
import 'dart:convert';
import 'package:chuva_dart/data/models/activities.dart';
import 'package:dio/dio.dart';
import 'package:html/parser.dart';
import 'package:intl/intl.dart';

import '../../data/repositories/activities_repository.dart';
import '../models/person.dart';

abstract class IActivitiesService{
  Future<List<Activities>> getActivities();
  List<Activities> filterActivitiesByDay(int day);
  List<Activities> getFavorites();
  Map<int, List<Activities>> getAllGroupedActivities ();
  void toggleFavorite(int id);
  bool isEmpty();
  String formatActivityTime(String start, String end);
  String convertDate(String date);
  String extractTextFromHtml(String htmlString);
  String formatSpeakers(List<Person> people);
  String formatData(String data);
}

class ActivitiesService implements IActivitiesService {
  List<Activities> activities = [];
  ActivitiesRepository repository = ActivitiesRepository();

  Map<int, List<Activities>> getAllGroupedActivities () {
    return repository.subActivities;
  }

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
  String formatSpeakers(List<Person> people){
    return people.map((person) => person.name).join(", ");
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

    Map<int, List<Activities>> groupedActivities = _groupActivitiesByParent(fetchedActivities);

    for (var parentId in groupedActivities.keys) {
      List<Activities> uniqueActivities = groupedActivities[parentId]!.where((activity) {
        return !repository.activities.any((existingActivity) => existingActivity.id == activity.id);
      }).toList();
      activities.addAll(uniqueActivities);
    }
    repository.saveAll(activities);
  }

  Map<int, List<Activities>> _groupActivitiesByParent(List<Activities> activitiesList) {
    for (var activity in activitiesList) {
      if (activity.parent != null) {
        if (!repository.groupedActivities.containsKey(activity.parent)) {
          repository.groupedActivities[activity.parent!] = [];
        }
        repository.groupedActivities[activity.parent!]!.add(activity);
      }
    }
    return repository.groupedActivities;
  }



  @override
  List<Activities> filterActivitiesByDay(int day){
    return activities.where((activity) => (convertDate(activity.start!)== "$day") && (convertDate(activity.end!) == "$day")).toList();
  }


  @override
  String convertDate(String date){
    return DateFormat.d().format(DateTime.parse(date).toUtc().subtract(const Duration(hours: 3)));
  }

  String formatData(String data){
    return DateFormat.Hm().format(DateTime.parse(data).toUtc().subtract(const Duration(hours: 3)));
  }

  @override
  String formatActivityTime(String start, String end) {
    final startTime = DateTime.parse(start);

    final dayOfWeek = toBeginningOfSentenceCase(DateFormat('EEEE', 'pt_BR').format(startTime));
    String startTimeLocal = DateFormat.Hm().format(DateTime.parse(start).toUtc().subtract(const Duration(hours: 3)));
    String endTimeLocal = DateFormat.Hm().format(DateTime.parse(end).toUtc().subtract(const Duration(hours: 3)));

    return '$dayOfWeek ${startTimeLocal}h - ${endTimeLocal}h';
  }

  @override
  String extractTextFromHtml(String htmlString) {
    Document document = parse(htmlString);
    List<Element> paragraphs = document.querySelectorAll('p');
    String allText = paragraphs.map((paragraph) => paragraph.text).join('\n\n');

    return allText;
  }


}