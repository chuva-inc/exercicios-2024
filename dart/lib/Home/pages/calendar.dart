import 'package:chuva_dart/Home/components/AppBar/app_bar.dart';
import 'package:chuva_dart/Home/components/Schedule/schedule.dart';
import 'package:chuva_dart/Home/components/TabBar/tab_bar.dart';

import 'package:flutter/material.dart';
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
                        style: const TextStyle(
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
              ],
            ),

            Expanded(
              child: TabBarView(
                  children: [

                    Schedule(),
                    Container(width: 200, height: 200, child: Center(child: Container( child: Text('2 Page',)))),
                    Container(width: 200, height: 200, child: Center(child: Container( child: Text('3 Page',)))),
                    Container(width: 200, height: 200, child: Center(child: Container( child: Text('4 Page',)))),
                    Container(width: 200, height: 200, child: Center(child: Container( child: Text('5 Page',)))),
                  ]
              ),
            )

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
