import 'package:chuva_dart/Home/service/activities_service.dart';
import 'package:chuva_dart/data/models/activities.dart';


abstract class IActivitiesController{
  Future<List<Activities>> getActivities(int day);
}

class ActivitiesController implements IActivitiesController{
  ActivitiesService activitiesService = ActivitiesService();

  @override
  Future<List<Activities>> getActivities(int day) async {
    return  activitiesService.getActivities(day);
  }

}