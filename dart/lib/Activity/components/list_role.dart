
import 'package:chuva_dart/Speaker/speaker.dart';
import 'package:chuva_dart/data/models/activities.dart';
import 'package:chuva_dart/data/models/person.dart';
import 'package:cached_network_image/cached_network_image.dart';

import 'package:flutter/material.dart';
import 'package:from_css_color/from_css_color.dart';
import 'package:go_router/go_router.dart';

class ListRole extends StatefulWidget {
  const ListRole({super.key, required this.activities, required this.listActivities});
  final Activities activities;
  final List<Activities> listActivities;

  @override
  State<ListRole> createState() => _ListRoleState();
}

class _ListRoleState extends State<ListRole> {
  final List<Person> people = [];
  List<Activities> speakerActivities = [];
  Set<int> uniqueActivityIds = {};

  @override
  void initState() {
    super.initState();
    extractTitles();
    speakerActivities = getActivitiesBySpeaker();
  }

  List<Activities> getActivitiesBySpeaker(){
    List<Activities> matchedActivities = [];
    for (var activity in widget.listActivities) {
      for (var person in activity.people) {
        if (people.any((p) => p.name == person.name) && !uniqueActivityIds.contains(activity.id)) {
          matchedActivities.add(activity);
          uniqueActivityIds.add(activity.id);
          break;
        }
      }
    }
    return matchedActivities;
  }



  void extractTitles() {
    bool hasModerator = widget.activities.people.any((person) => person.role!.label.ptBr == 'Moderador');
    if (hasModerator) {
      people.addAll(widget.activities.people.where((person) => person.role!.label.ptBr == 'Moderador'));
    } else {
      people.addAll(widget.activities.people.where((person) => person.role!.label.ptBr == 'Palestrante' || person.role!.label.ptBr == 'Coordenador'));
    }
  }



  @override
  Widget build(BuildContext context) {
    if (people.isEmpty) {
      return const SizedBox.shrink();
    }
    return Column(
      mainAxisSize: MainAxisSize.min,
      children: [
        Container(
          padding: const EdgeInsetsDirectional.only(start: 15),
          alignment: AlignmentDirectional.centerStart,
          child: Text(
            people.first.role!.label.ptBr!,
            style: Theme.of(context).textTheme.titleLarge,
          ),
        ),
        Flexible(
          child: ListView.builder(
            physics: const NeverScrollableScrollPhysics(),
            shrinkWrap: true,
            itemCount: people.length,
            itemBuilder: (context, index) {
              return ListTile(
                onTap: () {
                  context.push('/palestrantes', extra: Speaker(speaker: people[index], activities: widget.activities, listActivities: speakerActivities));
                },
                leading: ClipRRect(
                  borderRadius: BorderRadius.circular(50),
                  child: CachedNetworkImage(
                    imageUrl: "${people.elementAt(index).picture}",
                    placeholder: (context, url) => const CircularProgressIndicator(),
                    errorWidget: (context, url, error) => Icon(Icons.person, size: 35, color: fromCssColor("#898989")),
                  ),
                ),
                title: Text(people[index].name!),
                subtitle: Text(people[index].institution!),
                subtitleTextStyle: TextStyle(color: fromCssColor("#737373")),
              );
            },
          ),
        ),
      ],
    );
  }

}
