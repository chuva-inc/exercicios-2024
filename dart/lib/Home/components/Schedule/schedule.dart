

import 'package:chuva_dart/Home/components/Schedule/components/schedule_list_view.dart';
import 'package:chuva_dart/Home/controllers/activities_controller.dart';
import 'package:chuva_dart/data/stores/activities_store.dart';
import 'package:flutter/material.dart';

class Schedule extends StatefulWidget {
  const Schedule({super.key});

  @override
  State<Schedule> createState() => _ScheduleState();
}

class _ScheduleState extends State<Schedule> {

  final ActivitiesStore activitiesStore =
      ActivitiesStore(controller: ActivitiesController());

  @override
  void initState() {
    super.initState();
    activitiesStore.getActivities();
  }

  @override
  Widget build(BuildContext context) {
    return AnimatedBuilder(
        animation: Listenable.merge([
          activitiesStore.isLoading,
          activitiesStore.erro,
          activitiesStore.state,
        ]),
        builder: (BuildContext context, Widget? child) {
          if (activitiesStore.isLoading.value) {
            return Column(
              mainAxisSize: MainAxisSize.min,
              children: [
                Flexible(
                    child: Container(
                        alignment: AlignmentDirectional.center,
                        height: MediaQuery.of(context).size.height,
                        child: const CircularProgressIndicator())),
              ],
            );
          }
          if (activitiesStore.erro.value.isNotEmpty) {
            return Column(
              mainAxisSize: MainAxisSize.min,
              children: [
                Flexible(
                  child: Container(
                    alignment: AlignmentDirectional.center,
                    height: MediaQuery.of(context).size.height,
                    child: const Text(
                      'Erro ao carregar as atividades',
                      style: TextStyle(
                        color: Colors.black54,
                        fontWeight: FontWeight.w600,
                        fontSize: 20,
                      ),
                      textAlign: TextAlign.center,
                    ),
                  ),
                ),
              ],
            );
          } else {
            return ScheduleListView(scheduleLength: activitiesStore.state.value.length, scheduleItems: activitiesStore.state.value,);
          }
        });
  }
}
