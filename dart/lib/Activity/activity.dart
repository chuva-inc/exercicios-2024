import 'package:chuva_dart/Activity/components/add_button.dart';
import 'package:chuva_dart/Activity/components/info.dart';
import 'package:chuva_dart/Activity/components/list_role.dart';
import 'package:chuva_dart/Home/components/AppBar/app_bar.dart';
import 'package:chuva_dart/data/controllers/activities_controller.dart';
import 'package:flutter/material.dart';
import 'package:from_css_color/from_css_color.dart';
import 'package:html/dom.dart' as html;
import 'package:intl/date_symbol_data_local.dart';
import 'package:intl/intl.dart';
import 'package:html/parser.dart' show parse;
import '../data/models/activities.dart';


class Activity extends StatefulWidget {
  const Activity({super.key, required this.items, required this.activities});
  final Activities items;
  final List<Activities> activities;


  @override
  State<Activity> createState() => _ActivityState();
}

class _ActivityState extends State<Activity> {
  late String formattedTime;
  Activities get activities => widget.items;
  late ActivitiesController controller;

  @override
  void initState() {
    super.initState();
    initializeDateFormatting('pt_BR', null);
    controller = ActivitiesController();
    formattedTime = controller.formatActivityTime(activities.start!, activities.end!);
  }

  @override
  Widget build(BuildContext context) {

    String descriptionText = controller.extractTextFromHtml(activities.description!.ptBr!);
    List<Widget> subActivitiesWidgets = [];

    return Scaffold(
      appBar: const PreferredSize(
          preferredSize: Size.fromHeight(50),
          child: AppBarCalendar()
      ),
      body: Column(
        mainAxisSize: MainAxisSize.max,
        mainAxisAlignment: MainAxisAlignment.center,
        children: [
          Row(
            children: [
              Flexible(
                child: Container(
                  alignment: Alignment.centerLeft,
                  padding: const EdgeInsetsDirectional.symmetric(horizontal: 10),
                  height: 30,
                  color: fromCssColor(activities.category.color!),
                  child: Text(
                      activities.category.title!.ptBr!,
                    style: const TextStyle(color: Colors.white),
                  ),
                ),
              ),
            ],
          ),
          Container(
            padding: const EdgeInsetsDirectional.symmetric(vertical: 15),
            child: Text(
                activities.title!.ptBr!,
              textAlign: TextAlign.center,
              style: Theme.of(context).textTheme.headlineLarge,
            ),
          ),
          Info(formattedTime: formattedTime, activities: activities,),
          const SizedBox(height: 10,),
          AddButton(activitie: activities),
          const SizedBox(height: 10,),
          Expanded(
            child: SingleChildScrollView(
              child: Container(
                alignment: AlignmentDirectional.center,
                padding: const EdgeInsetsDirectional.symmetric(horizontal: 10, ),
                child: Text(
                  descriptionText,
                  textAlign: TextAlign.start,
                  style: Theme.of(context).textTheme.bodyMedium,
                ),
              ),
            ),
          ),
          Flexible(
              child: Column(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  const SizedBox(height: 10,),
                  ListRole(activities: activities, listActivities: widget.activities,),
                ],
              )
          ),
          ...subActivitiesWidgets
        ],
      ),
    );
  }
}