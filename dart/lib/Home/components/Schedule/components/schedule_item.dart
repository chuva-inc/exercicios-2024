
import 'package:chuva_dart/Activity/activity.dart';
import 'package:chuva_dart/data/models/activities.dart';
import 'package:chuva_dart/data/models/person.dart';
import 'package:chuva_dart/data/repositories/activities_repository.dart';

import 'package:flutter/material.dart';

import 'package:from_css_color/from_css_color.dart';
import 'package:go_router/go_router.dart';
import 'package:intl/intl.dart';
import 'package:provider/provider.dart';

class ScheduleItems extends StatelessWidget {
  const ScheduleItems({super.key, required this.items, required this.activities});
  final Activities items;
  final List<Activities> activities;




  @override
  Widget build(BuildContext context) {
    ActivitiesRepository activitiesRepository = context.watch<ActivitiesRepository>();
    bool isActivityFavorite = activitiesRepository.favorites.any((fav) => fav.id == items.id);

    return Column(
      children: [
        Padding(
          padding: const EdgeInsets.only(left: 10, right: 10, top: 10),
          child: Material(
            elevation: 5,
            borderRadius: BorderRadius.circular(5),
            child: InkWell(
              onTap: () {
                context.push('/activities', extra: Activity(items: items, activities: activities));
              },
              child: Ink(
                padding: const EdgeInsets.only(left: 0),
                decoration: BoxDecoration(
                  color: Colors.white,
                  borderRadius: BorderRadius.circular(5),
                ),
                child: Stack(
                  children: [
                    Positioned(
                      left: 0.0,
                      top: 0.0,
                      bottom: 0.0,
                      child: ClipRRect(
                        borderRadius: const BorderRadius.only(
                          topLeft: Radius.circular(5),
                          bottomLeft: Radius.circular(5),
                        ),
                        child: Container(
                          color: fromCssColor("${items.category.color}"),
                          width: 8,
                        ),
                      ),
                    ),
                    Padding(
                      padding: const EdgeInsets.only(left: 20),
                      child: Row(
                        children: [
                          Expanded(
                            child: ListTile(
                              minVerticalPadding: 10,
                              subtitle: Container(
                                alignment: AlignmentDirectional.centerStart,
                                child: Text(
                                  formataPalestrantes(items.people),
                                ),
                              ),
                              title: Column(
                                children: [
                                  Container(
                                    alignment: AlignmentDirectional.centerStart,
                                    child: Text(
                                      "${items.type.title.ptBr} de ${fomataData(items.start!, items.end!)}",
                                      style: Theme.of(context).textTheme.labelLarge,
                                    ),
                                  ),
                                  Container(
                                    alignment: AlignmentDirectional.centerStart,
                                    child: Text("${items.title?.ptBr}",
                                      style: Theme.of(context).textTheme.titleLarge,
                                    ),
                                  ),
                                ],
                              ),
                            ),
                          ),
                        ],
                      ),
                    ),
                    if (isActivityFavorite) // Condição para exibir o ícone de bookmark.
                      Positioned(
                        right: 0,
                        top: 0,
                        child: Icon(Icons.bookmark, color: fromCssColor("#7c90ac")),
                      ),
                  ],
                ),
              ),
            ),
          ),
        ),
      ],
    );
  }


  String formataPalestrantes(List<Person> people){
    return people.map((person) => person.name).join(", ");
  }

  String fomataData(String start, String end){
    String startTimeLocal = DateFormat.Hm().format(DateTime.parse(start).toUtc().subtract(const Duration(hours: 3)));
    String endTimeLocal = DateFormat.Hm().format(DateTime.parse(end).toUtc().subtract(const Duration(hours: 3)));
    return '$startTimeLocal até $endTimeLocal';
  }
}
