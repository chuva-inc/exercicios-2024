import 'package:chuva_dart/application/Home/components/AppBar/app_bar.dart';
import 'package:chuva_dart/application/Home/components/Schedule/schedule_items.dart';
import 'package:chuva_dart/application/Activity/components/add_button.dart';
import 'package:chuva_dart/application/Activity/components/info.dart';
import 'package:chuva_dart/application/Activity/components/list_role.dart';
import 'package:chuva_dart/data/controllers/activities_controller.dart';
import 'package:chuva_dart/data/models/activities.dart';

import 'package:flutter/material.dart';
import 'package:from_css_color/from_css_color.dart';
import 'package:intl/date_symbol_data_local.dart';
import '../components/sub_activitie_text.dart';

class Activity extends StatefulWidget {
  const Activity({super.key, required this.items, required this.activities});

  final Activities items;
  final List<Activities> activities;

  @override
  State<Activity> createState() => _ActivityState();
}

class _ActivityState extends State<Activity> {
  late String formattedTime;
  String parentActivity = "";
  int parent = 0;

  Activities get activity => widget.items;
  late ActivitiesController controller;

  @override
  void initState() {
    super.initState();
    initializeDateFormatting('pt_BR', null);
    controller = ActivitiesController();

    formattedTime =
        controller.formatActivityTime(activity.start!, activity.end!);
  }

  @override
  Widget build(BuildContext context) {
    String descriptionText =
        controller.extractTextFromHtml(activity.description!.ptBr!);
    List<Widget> subActivitiesWidgets = [];
    Map<int, List<Activities>> groupedSubActivities =
        controller.getAllGroupedActivities();
    List<Activities> subActivities = groupedSubActivities[activity.id] ?? [];
    int parent = activity.parent!;
    if (parent != 0) {
      parentActivity = controller.getActivityById(parent).title!.ptBr!;
    }
    if (subActivities.isNotEmpty) {
      subActivitiesWidgets.add(
        Row(
          children: [
            Container(
              padding: const EdgeInsetsDirectional.only(start: 15, bottom: 5),
              child: Text(
                "Sub-atividades",
                textAlign: TextAlign.start,
                style: Theme.of(context).textTheme.bodyLarge,
              ),
            ),
          ],
        ),
      );
      subActivitiesWidgets.addAll(subActivities.map((subActivity) {
        return ScheduleItems(
          items: subActivity,
          activities: subActivities,
          data:
              "${subActivity.type.title.ptBr} de ${controller.formatData(subActivity.start!)} até ${controller.formatData(subActivity.end!)}",
        );
      }).toList());
    }

    return Scaffold(
      appBar: const PreferredSize(
          preferredSize: Size.fromHeight(50), child: AppBarCalendar()),
      body: SingleChildScrollView(
        child: Column(
          mainAxisSize: MainAxisSize.min,
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            Row(
              children: [
                Flexible(
                  child: Container(
                    alignment: Alignment.centerLeft,
                    padding:
                        const EdgeInsetsDirectional.symmetric(horizontal: 10),
                    height: 30,
                    color: fromCssColor(activity.category.color!),
                    child: Text(
                      activity.category.title!.ptBr!,
                      style: const TextStyle(color: Colors.white),
                    ),
                  ),
                ),
              ],
            ),
            if (subActivities.isEmpty && parent != 0) ...[
              SubActivitieText(
                title: parentActivity,
              )
            ],
            Container(
              padding: const EdgeInsetsDirectional.symmetric(vertical: 15),
              child: Text(
                activity.title!.ptBr!,
                textAlign: TextAlign.center,
                style: Theme.of(context).textTheme.headlineLarge,
              ),
            ),
            Info(
              formattedTime: formattedTime,
              activities: activity,
            ),
            const SizedBox(
              height: 10,
            ),
            AddButton(activitie: activity),
            const SizedBox(
              height: 10,
            ),
            const SizedBox(height: 30),
            Flexible(
              child: Container(
                alignment: AlignmentDirectional.center,
                padding: const EdgeInsetsDirectional.symmetric(
                  horizontal: 20,
                ),
                child: Text(
                  descriptionText,
                  textAlign: TextAlign.start,
                  style: Theme.of(context).textTheme.bodyMedium,
                ),
              ),
            ),
            ...subActivitiesWidgets,
            const SizedBox(height: 30),
            Flexible(
              child: Column(
                mainAxisAlignment: MainAxisAlignment.end,
                mainAxisSize: MainAxisSize.min,
                children: [
                  const SizedBox(
                    height: 10,
                  ),
                  ListRole(
                    activities: activity,
                    listActivities: widget.activities,
                  ),
                ],
              ),
            ),
          ],
        ),
      ),
    );
  }
}
