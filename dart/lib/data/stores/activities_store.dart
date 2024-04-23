
import 'package:chuva_dart/Home/controllers/activities_controller.dart';
import 'package:chuva_dart/data/exceptions/exceptions.dart';
import 'package:chuva_dart/data/models/activities.dart';
import 'package:flutter/cupertino.dart';

class ActivitiesStore{
  final IActivitiesController controller;

  //variavel reativa para o loading
  final ValueNotifier<bool> isLoading = ValueNotifier<bool>(false);

  //variavel reativa para o state
  final ValueNotifier<List<Activities>> state =
  ValueNotifier<List<Activities>>([]);

  //variavel reativa para o erro
  final ValueNotifier<String> erro = ValueNotifier<String>("");

  ActivitiesStore({required this.controller});

  Future getActivities() async {
    isLoading.value = true;
    try {
      final result = await controller.getActivities();
      state.value = result;
    } on NotFoundException catch (e) {

      erro.value = e.message;
    } catch (e) {
      print(e.toString());
      erro.value = e.toString();
    }
    isLoading.value = false;
  }
}