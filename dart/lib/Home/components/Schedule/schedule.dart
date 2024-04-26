

import 'package:chuva_dart/Home/components/Schedule/components/schedule_item.dart';
import 'package:chuva_dart/Home/controllers/activities_controller.dart';
import 'package:chuva_dart/Home/service/Activities_service.dart';
import 'package:chuva_dart/data/stores/activities_store.dart';
import 'package:flutter/material.dart';
import 'package:provider/provider.dart';



class Schedule extends StatefulWidget {
  const Schedule({super.key, required this.day});
  final int day;

  @override
  State<Schedule> createState() => _ScheduleState();
}

class _ScheduleState extends State<Schedule> {

  late final ActivitiesStore activitiesStore;


  @override
  void initState() {
    super.initState();
     activitiesStore =
    ActivitiesStore(controller: ActivitiesController(), day: widget.day);
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
            return
              ListView.separated(
                separatorBuilder: (context, index) => Container(
                  height: 3,
                ),
                itemCount: activitiesStore.state.value.length,
                itemBuilder: (_, index) {
                  final items = activitiesStore.state.value.elementAt(index);
                  return ScheduleItems(items: items);
                });
          }
        });
  }
}
