import 'package:chuva_dart/data/controllers/activities_controller.dart';
import 'package:chuva_dart/data/exceptions/exceptions.dart';
import 'package:chuva_dart/data/models/activities.dart';
import 'package:flutter/cupertino.dart';

class ActivitiesStore {
  final IActivitiesController controller;
  final int day;

  final ValueNotifier<bool> isLoading = ValueNotifier<bool>(false);

  final ValueNotifier<List<Activities>> state =
      ValueNotifier<List<Activities>>([]);

  final ValueNotifier<String> erro = ValueNotifier<String>("");

  ActivitiesStore({required this.controller, required this.day});

  Future getActivities() async {
    isLoading.value = true;
    try {
      final result = await controller.getActivities();
      state.value = result;
    } on NotFoundException catch (e) {
      erro.value = e.message;
    } catch (e) {
      erro.value = e.toString();
    }
    isLoading.value = false;
  }

  List<Activities> filterActivitiesByDay(day) {
    return controller.filterActivitiesByDay(day);
  }
}
