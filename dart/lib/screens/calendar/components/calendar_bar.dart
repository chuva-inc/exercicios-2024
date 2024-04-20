
import 'package:flutter/material.dart';

import '../../../theme/theme.dart';
import 'calendar_days.dart';

class CalendarBar extends StatefulWidget {
  const CalendarBar({super.key});

  @override
  State<CalendarBar> createState() => _CalendarBarState();
}

class _CalendarBarState extends State<CalendarBar> {
  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: const EdgeInsets.only(bottom: 12.0),
      child: Container(
        height: 50,
        width: double.infinity,
        color: ThemeColor.blue,
        child: Row(
          mainAxisAlignment: MainAxisAlignment.start,
          crossAxisAlignment: CrossAxisAlignment.center,
          children: [
            Container(
              color: Colors.white,
              width: 50,
              height: 50,
              child: const Text(
                textAlign: TextAlign.center,
                "Nov 2023",
                style: TextStyle(
                  fontWeight: FontWeight.bold,
                  fontSize: 17,
                ),
              ),
            ),
            CalendarDays(title: "26", date: DateTime(2023, 11, 26)),
            CalendarDays(title: "27", date: DateTime(2023, 11, 27)),
            CalendarDays(title: "28", date: DateTime(2023, 11, 28)),
            CalendarDays(title: "29", date: DateTime(2023, 11, 29)),
          ],
        ),
      ),
    );
  }
}