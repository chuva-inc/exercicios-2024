import 'package:chuva_dart/Activity/components/add_button.dart';
import 'package:chuva_dart/Activity/components/info.dart';
import 'package:chuva_dart/Home/components/AppBar/app_bar.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter/widgets.dart';
import 'package:from_css_color/from_css_color.dart';
import 'package:html/dom.dart' as html;
import 'package:intl/date_symbol_data_local.dart';
import 'package:intl/intl.dart';
import 'package:html/parser.dart' show parse;
import '../data/models/activities.dart';

class Activity extends StatefulWidget {
  const Activity({super.key, required this.items});
  final Activities items;

  @override
  State<Activity> createState() => _ActivityState();
}

class _ActivityState extends State<Activity> {
  late String formattedTime;
  Activities get activities => widget.items;

  @override
  void initState() {
    super.initState();
    initializeDateFormatting('pt_BR', null);
    formattedTime = formatActivityTime(activities.start!, activities.end!);
  }

  String formatActivityTime(String start, String end) {
    final startTime = DateTime.parse(start);

    final dayOfWeek = toBeginningOfSentenceCase(DateFormat('EEEE', 'pt_BR').format(startTime));
    String startTimeLocal = DateFormat.Hm().format(DateTime.parse(start).toUtc().subtract(const Duration(hours: 3)));
    String endTimeLocal = DateFormat.Hm().format(DateTime.parse(end).toUtc().subtract(const Duration(hours: 3)));

    return '$dayOfWeek ${startTimeLocal}h - ${endTimeLocal}h';
  }
  String extractTextFromHtml(String htmlString) {
    html.Document document = parse(htmlString);
    html.Element? paragraph = document.querySelector('p');
    return paragraph?.text ?? '';
  }

  @override
  Widget build(BuildContext context) {
    String descriptionText = extractTextFromHtml(activities.description!.ptBr!);
    return Scaffold(
      appBar: const PreferredSize(
          preferredSize: Size.fromHeight(50),
          child: AppBarCalendar()
      ),
      body: Column(
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
          Flexible(
            child: Container(
              padding: const EdgeInsetsDirectional.symmetric(vertical: 15),
              child: Text(
                  activities.title!.ptBr!,
                textAlign: TextAlign.center,
                style: Theme.of(context).textTheme.headlineLarge,
              ),
            ),
          ),
          Info(formattedTime: formattedTime, activities: activities,),
          const   SizedBox(height: 10,),
          AddButton(),
          Flexible(
            flex: 2,
            child: Container(
              alignment: AlignmentDirectional.center,
              padding: const EdgeInsetsDirectional.symmetric(horizontal: 10),
              child: Text(
                descriptionText,
                textAlign: TextAlign.start,
              ),
            ),
          ),
        ],
      ),
    );
  }
}