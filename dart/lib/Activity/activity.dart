import 'package:chuva_dart/Home/components/AppBar/app_bar.dart';
import 'package:flutter/material.dart';

import '../shared/button_app_bar.dart';

class Activity extends StatefulWidget {
  const Activity({super.key});

  @override
  State<Activity> createState() => _ActivityState();
}

class _ActivityState extends State<Activity> {


  @override
  Widget build(BuildContext context) {
    return const Scaffold(
      appBar: PreferredSize(
          preferredSize: Size.fromHeight(120),
          child: AppBarCalendar()
      ),
      // body: ,
    );
  }
}