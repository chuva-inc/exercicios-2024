

import 'package:chuva_dart/Home/service/Activities_service.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

class ScheduleListView extends StatelessWidget {
  const ScheduleListView({super.key});


  @override
  Widget build(BuildContext context) {
    final activities = Provider.of<ActivitiesService>(context).activities;
    
    return Expanded(
      child: ListView.separated(
          separatorBuilder: (context, index) => Container(
            height: 5,
          ),
          padding: const EdgeInsets.all(16),
          itemCount: activities.length,
          itemBuilder: (_, index) {
            final items = activities.elementAt(index);
            return Column(
              children: [
                ElevatedButton(
                  onPressed: () {},
                  style: ButtonStyle(
                    backgroundColor: MaterialStatePropertyAll(Colors.red),
                    shape: MaterialStateProperty.all(
                      RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(20),
                        side: const BorderSide(
                            color: Colors.black,
                            width: 1.0),
                      ),
                    ),
                    elevation: const MaterialStatePropertyAll(10),
                  ),
                  child: ListTile(
                    title: Column(
                      children: [
                        Text("aquii${items.title?.ptBr}", style: TextStyle(color: Colors.black),),
                        Text("${items.changed}")
                      ],
                    )
                  ),

                ),
              ],
            );
          }),
    );
  }
}
