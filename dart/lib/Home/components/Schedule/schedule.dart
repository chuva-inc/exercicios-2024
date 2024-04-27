

import 'package:chuva_dart/Home/components/Schedule/components/schedule_item.dart';
import 'package:chuva_dart/Home/controllers/activities_controller.dart';
import 'package:chuva_dart/data/stores/activities_store.dart';
import 'package:flutter/material.dart';




class Schedule extends StatefulWidget {
  const Schedule( {super.key, required this.day, required this.activitiesLoader, required this.activitiesStore});
  final int day;
  final Future activitiesLoader;
  final ActivitiesStore activitiesStore;

  @override
  State<Schedule> createState() => _ScheduleState();
}

class _ScheduleState extends State<Schedule> {

  @override
  Widget build(BuildContext context) {
    return FutureBuilder(
      future: widget.activitiesLoader,
      builder: (context, snapshot) {
        if (snapshot.connectionState == ConnectionState.waiting) {
          return const Center(child: CircularProgressIndicator());
        } else if (snapshot.hasError) {
          return const Text('Erro ao carregar as atividades');
        } else {
          return ListView.separated(
            separatorBuilder: (context, index) => Container(height: 3),
            itemCount: widget.activitiesStore.filterActivitiesByDay(widget.day).length,
            itemBuilder: (_, index) {
              final items = widget.activitiesStore.filterActivitiesByDay(widget.day).elementAt(index);
              return ScheduleItems(items: items);
            },
          );
        }
      },
    );
  }
}

