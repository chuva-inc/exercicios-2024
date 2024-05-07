import 'package:chuva_dart/Activity/activity.dart';
import 'package:chuva_dart/data/controllers/activities_controller.dart';
import 'package:chuva_dart/data/models/activities.dart';
import 'package:chuva_dart/data/repositories/activities_repository.dart';

import 'package:flutter/material.dart';

import 'package:from_css_color/from_css_color.dart';
import 'package:go_router/go_router.dart';
import 'package:provider/provider.dart';

class ScheduleItems extends StatelessWidget {
  const ScheduleItems({super.key, required this.items, required this.activities, required this.data});
  final Activities items;
  final List<Activities> activities;
  final String data;




  @override
  Widget build(BuildContext context) {
    ActivitiesRepository activitiesRepository = context.watch<ActivitiesRepository>();
    bool isActivityFavorite = activitiesRepository.favorites.any((fav) => fav.id == items.id);
    ActivitiesController controller = ActivitiesController();

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
                                  controller.formatSpeakers(items.people),
                                ),
                              ),
                              title: Column(
                                children: [
                                  Container(
                                    alignment: AlignmentDirectional.centerStart,
                                    child: Text(
                                      data,
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
                    if (isActivityFavorite)
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
}