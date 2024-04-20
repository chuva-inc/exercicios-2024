import 'package:chuva_dart/Activity/activity.dart';
import 'package:chuva_dart/Home/components/app_bar.dart';
import 'package:chuva_dart/Home/components/TabBar/tab_bar.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter/widgets.dart';
import 'package:intl/intl.dart';

class Calendar extends StatefulWidget {
  const Calendar({super.key});

  @override
  State<Calendar> createState() => _CalendarState();
}

class _CalendarState extends State<Calendar> {
  DateTime _currentDate = DateTime(2023, 11, 26);

  bool _clicked = false;

  void _changeDate(DateTime newDate) {
    setState(() {
      _currentDate = newDate;
    });
  }

  @override
  Widget build(BuildContext context) {
    String formattedMonth = DateFormat('MMM').format(_currentDate);
    return DefaultTabController(
      length: 5,
      child: Scaffold(
        appBar: const PreferredSize(
            preferredSize: Size.fromHeight(120), child: AppBarCalendar()),
        body: Column(
          children: [
            Row(
              children: [
                Padding(
                  padding:
                      const EdgeInsets.symmetric(horizontal: 5, vertical: 5),
                  child: Column(
                    children: [
                       Text(
                        formattedMonth,
                        style: TextStyle(
                            fontWeight: FontWeight.w400,
                            fontSize: 25,
                            height: 0.8),
                      ),
                      Text(
                        '${_currentDate.year}',
                        style: const TextStyle(
                            fontWeight: FontWeight.bold, fontSize: 25),
                      ),
                    ],
                  ),
                ),
                Expanded(
                  child: Container(
                    // width: 200,
                      color: Theme.of(context)
                          .colorScheme
                          .primary
                          .withRed(48)
                          .withGreen(109)
                          .withBlue(195),
                      child: const Tab_Bar()),
                ),
                // Container(
                //   color: Theme.of(context)
                //       .colorScheme
                //       .primary
                //       .withRed(48)
                //       .withGreen(109)
                //       .withBlue(195),
                // )
              ],
            ),
            // const Text(
            //   'Nov',
            // ),
            // const Text(
            //   '2023',
            // ),
            // OutlinedButton(
            //   onPressed: () {
            //     _changeDate(DateTime(2023, 11, 26));
            //   },
            //   child: Text(
            //     '26',
            //     style: Theme.of(context).textTheme.headlineMedium,
            //   ),
            // ),
            // OutlinedButton(
            //   onPressed: () {
            //     _changeDate(DateTime(2023, 11, 28));
            //   },
            //   child: Text(
            //     '28',
            //     style: Theme.of(context).textTheme.headlineMedium,
            //   ),
            // ),
            // if (_currentDate.day == 26)
            //   OutlinedButton(
            //       onPressed: () {
            //         setState(() {
            //           _clicked = true;
            //         });
            //       },
            //       child: const Text('Mesa redonda de 07:00 até 08:00')),
            // if (_currentDate.day == 28)
            //   OutlinedButton(
            //       onPressed: () {
            //         setState(() {
            //           _clicked = true;
            //         });
            //       },
            //       child: const Text('Palestra de 09:30 até 10:00')),
            // if (_currentDate.day == 26 && _clicked) const Activity(),
          ],
        ),
      ),
    );
  }
}
