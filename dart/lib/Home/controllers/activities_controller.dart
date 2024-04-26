import 'package:chuva_dart/Home/service/activities_service.dart';
import 'package:chuva_dart/data/models/activities.dart';


abstract class IActivitiesController{
  Future<List<Activities>> getActivities();
  List<Activities> filterActivitiesByDay(int day);
  bool isEmpty();
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
  bool isEmpty() {
    return activitiesService.isEmpty();
  }



}