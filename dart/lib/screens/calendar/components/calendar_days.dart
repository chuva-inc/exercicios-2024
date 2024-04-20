
// ignore_for_file: use_super_parameters

import 'package:flutter/material.dart';
import 'package:from_css_color/from_css_color.dart';
import 'package:get/get.dart';

import '../../../theme/theme.dart';
import '../controller/controller_calendar.dart';

class CalendarDays extends StatefulWidget {
  const CalendarDays({Key? key, required this.title, required this.date})
      : super(key: key);

  final String title;
  final DateTime date;

  @override
  State<CalendarDays> createState() => _CalendarDaysState();
}

class _CalendarDaysState extends State<CalendarDays> {
  final controller = Get.put(CalendarController());
  @override
  Widget build(BuildContext context) {
    return GestureDetector(
      onTap: () {
        controller.changeDate(widget.date);
      },
      child: SizedBox(
        width: 50,
        height: 50,
        child: Center(child: Obx(() {
          return Text(
            widget.title,
            style: TextStyle(
                fontWeight: FontWeight.bold,
                color: controller.currentDate.value == widget.date
                    ? ThemeColor.white
                    : fromCssColor("lightgray"),
                fontSize: 15),
          );
        })),
      ),
    );
  }
}