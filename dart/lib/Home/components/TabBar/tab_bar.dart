
import 'package:chuva_dart/Home/components/TabBar/tab_item.dart';
import 'package:flutter/material.dart';

class Tab_Bar extends StatelessWidget {
  final DateTime currentDate;
  final TabController controller;
  const Tab_Bar({super.key, required this.currentDate, required this.controller});


  @override
  Widget build(BuildContext context) {
    return SizedBox(
      height: 60,
      child: TabBar(
        controller: controller,
        isScrollable: true,
          tabAlignment: TabAlignment.start,
         indicatorSize: TabBarIndicatorSize.tab,
          dividerColor: Colors.transparent,
          indicator: const BoxDecoration(
            border: Border(bottom: BorderSide(color: Colors.black26, width: 3))
          ),
          labelColor: Colors.white,
          unselectedLabelColor: Colors.white54,
          tabs: List.generate(5, (index) {
            DateTime tabDate = currentDate.add(Duration(days: index));
            return TabItem(title: '${tabDate.day}');
          }),
      ),
    );
  }
}
