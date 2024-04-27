
import 'package:chuva_dart/Home/components/AppBar/app_bar.dart';
import 'package:flutter/material.dart';

import '../data/models/person.dart';

class Speaker extends StatefulWidget {
  const Speaker({super.key, required this.speaker});
  final Person speaker;

  @override
  State<Speaker> createState() => _SpeakerState();
}

class _SpeakerState extends State<Speaker> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: const PreferredSize(
          preferredSize: Size.fromHeight(50),
          child: AppBarCalendar()
      ),

    );
  }
}
