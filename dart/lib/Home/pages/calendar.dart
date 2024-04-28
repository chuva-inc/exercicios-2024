import 'package:chuva_dart/Home/components/AppBar/app_bar.dart';
import 'package:chuva_dart/Home/components/Schedule/schedule.dart';
import 'package:chuva_dart/Home/components/TabBar/tab_bar.dart';
import 'package:chuva_dart/data/controllers/activities_controller.dart';
import 'package:chuva_dart/shared/button_app_bar.dart';

import 'package:flutter/material.dart';
import 'package:intl/intl.dart';

import '../../data/stores/activities_store.dart';

class Calendar extends StatefulWidget {
  const Calendar({super.key});

  @override
  State<Calendar> createState() => _CalendarState();

}

class _CalendarState extends State<Calendar> with SingleTickerProviderStateMixin{
  late final TabController _tabController;
  final DateTime _currentDate = DateTime(2023, 11, 26);
  late final ActivitiesStore activitiesStore;
  late final Future _activitiesLoader;


  @override
  void initState() {
    super.initState();
    _tabController = TabController(length: 5, vsync: this);
    activitiesStore = ActivitiesStore(controller: ActivitiesController(), day: _currentDate.day);
    _activitiesLoader = activitiesStore.getActivities();
  }

  @override
  void dispose() {
    _tabController.dispose();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    String formattedMonth = DateFormat('MMM').format(_currentDate);
    return Scaffold(
      appBar: const PreferredSize(
          preferredSize: Size.fromHeight(120), child: AppBarCalendar(subtitle: '\n Progamação', buttonAppBar: ButtonAppBar(),)),
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
                    color: Theme.of(context).tabBarTheme.labelColor,
                    child: Tab_Bar(currentDate: _currentDate, controller: _tabController,)),
              ),
            ],
          ),

          Expanded(
            child: TabBarView(
              controller: _tabController,
              children: List.generate(5, (index) {
                int day = _currentDate.day + index;
                return Schedule(day: day,activitiesLoader: _activitiesLoader, activitiesStore: activitiesStore,);
              }),
            ),
          )
        ],
      ),
    );
  }
}
