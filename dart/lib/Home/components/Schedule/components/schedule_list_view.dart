

import 'package:chuva_dart/data/models/activities.dart';
import 'package:flutter/material.dart';

class ScheduleListView extends StatelessWidget {
  const ScheduleListView({super.key, required this.scheduleLength, required this.scheduleItems});
  final int scheduleLength;
  final List<Activities>scheduleItems;

  @override
  Widget build(BuildContext context) {
    return ListView.separated(
        separatorBuilder: (context, index) => Container(
          height: 15,
        ),
        itemCount: scheduleLength,

        itemBuilder: (_, index) {
          final items = scheduleItems.elementAt(index);
          print(items.name);
          ElevatedButton(
            onPressed: () {},
            style: ButtonStyle(
              shape: MaterialStateProperty.all(
                RoundedRectangleBorder(
                  borderRadius: BorderRadius.circular(20),
                ),
              ),
              elevation: const MaterialStatePropertyAll(15),
            ),
            child: ListTile(
              title: Column(
                children: [
                  Text("${items.name}")
                ],
              )
            ),

          );
        });
  }
}
