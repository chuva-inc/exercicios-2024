import 'package:chuva_dart/Home/components/AppBar/app_bar.dart';
import 'package:chuva_dart/Home/components/Schedule/schedule.dart';
import 'package:chuva_dart/Home/components/TabBar/tab_bar.dart';
import 'package:chuva_dart/data/controllers/activities_controller.dart';
import 'package:chuva_dart/data/repositories/activities_repository.dart';
import 'package:chuva_dart/shared/button_app_bar.dart';

import 'package:flutter/material.dart';
import 'package:go_router/go_router.dart';
import 'package:intl/intl.dart';
import 'package:provider/provider.dart';

import '../../data/stores/activities_store.dart';
import '../components/Schedule/components/schedule_item.dart';

class Calendar extends StatefulWidget {
  const Calendar({super.key});

  @override
  State<Calendar> createState() => _CalendarState();
}

class _CalendarState extends State<Calendar>
    with SingleTickerProviderStateMixin {
  late final TabController _tabController;
  final DateTime _currentDate = DateTime(2023, 11, 26);
  late final ActivitiesStore activitiesStore;
  late final Future _activitiesLoader;

  @override
  void initState() {
    super.initState();
    _tabController = TabController(length: 5, vsync: this);
    activitiesStore = ActivitiesStore(
        controller: ActivitiesController(), day: _currentDate.day);
    _activitiesLoader = activitiesStore.getActivities();

  }

  @override
  void dispose() {
    _tabController.dispose();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    ActivitiesRepository activitiesRepository = Provider.of<ActivitiesRepository>(context);
    String formattedMonth = DateFormat('MMM').format(_currentDate);
    return Scaffold(
      appBar: PreferredSize(
        preferredSize: Size.fromHeight(120),
        child: AppBar(
            backgroundColor: Theme.of(context).appBarTheme.foregroundColor,
            elevation: 10,
            leading: GoRouter.of(context).canPop()
                ? IconButton(
              icon: const Icon(Icons.arrow_back_ios, color: Colors.white),
              onPressed: () => GoRouter.of(context).pop(),
            )
                : const Icon(Icons.arrow_back_ios, color: Colors.white),
            centerTitle: true,
            title: const Column(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                Text("Chuva 💜 Flutter", style: TextStyle(color: Colors.white),),
                Text("Programação", style: TextStyle(color: Colors.white),)
              ],
            ),
            bottom: const PreferredSize(
              preferredSize: Size.fromHeight(80.0),
              child: ButtonAppBar(),
            )),
      ),
      body: Column(
        children: [
          Row(
            children: [
              Padding(
                padding: const EdgeInsets.symmetric(horizontal: 5, vertical: 5),
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
                    child: Tab_Bar(
                      currentDate: _currentDate,
                      controller: _tabController,
                    )),
              ),
            ],
          ),
          Expanded(
            child: TabBarView(
              controller: _tabController,
              children: List.generate(5, (index) {
                int day = _currentDate.day + index;
                return
                  FutureBuilder(
                    future: _activitiesLoader,
                    builder: (context, snapshot) {
                      if (snapshot.connectionState == ConnectionState.waiting) {
                        return const Center(child: CircularProgressIndicator());
                      } else if (snapshot.hasError) {
                        return const Text('Erro ao carregar as atividades');
                      } else {
                        return ListView.separated(
                          separatorBuilder: (context, index) => Container(height: 3),
                          itemCount: activitiesStore.filterActivitiesByDay(day).length,
                          itemBuilder: (_, index) {
                            final items = activitiesStore.filterActivitiesByDay(day).elementAt(index);
                            return ScheduleItems(items: items, activities: activitiesStore.filterActivitiesByDay(day), data:"${items.type.title.ptBr} de ${fomataData(items.start!)} até ${fomataData(items.end!)}" );
                          },
                        );
                      }
                    },
                  );
              }),
            ),
          )
        ],
      ),
    );
  }
  String fomataData(String data){
    return DateFormat.Hm().format(DateTime.parse(data).toUtc().subtract(const Duration(hours: 3)));
  }
}