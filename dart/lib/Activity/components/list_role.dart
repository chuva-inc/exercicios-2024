
import 'package:chuva_dart/data/models/activities.dart';
import 'package:chuva_dart/data/models/person.dart';
import 'package:cached_network_image/cached_network_image.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:from_css_color/from_css_color.dart';
import 'package:go_router/go_router.dart';

class ListRole extends StatefulWidget {
  const ListRole({super.key, required this.activities});
  final Activities activities;

  @override
  State<ListRole> createState() => _ListRoleState();
}

class _ListRoleState extends State<ListRole> {
  final List<Person> people = [];

  @override
  void initState() {
    super.initState();
    extractTitles();
  }

  void extractTitles() {
    bool hasModerator = widget.activities.people.any((person) => person.role!.label.ptBr == 'Moderador');
    if (hasModerator) {
      people.addAll(widget.activities.people.where((person) => person.role!.label.ptBr == 'Moderador'));
    } else {
      people.addAll(widget.activities.people.where((person) => person.role!.label.ptBr == 'Palestrante'));
    }
  }

  @override
  Widget build(BuildContext context) {
    return Column(
      mainAxisSize: MainAxisSize.min,
      children: [
        Container(
          padding: const EdgeInsetsDirectional.only(start: 15),
          alignment: AlignmentDirectional.centerStart,
          child: Text(
              people.first.role!.label.ptBr!,
            style: Theme.of(context).textTheme.bodyLarge,
          ),
        ),
        Flexible(
          child: ListView.builder(
            shrinkWrap: true,
            physics: const NeverScrollableScrollPhysics(),
            itemCount: people.length,
            itemBuilder: (context, index) {
              return ListTile(
                onTap: () {
                  context.push('/palestrantes', extra: people[index]);
                },
                leading: ClipRRect(
                  borderRadius: BorderRadius.circular(50),
                  child: CachedNetworkImage(
                    imageUrl: "${people.elementAt(index).picture}",
                    placeholder: (context, url) => const CircularProgressIndicator(),
                    errorWidget: (context, url, error) => const Icon(Icons.error),
                  ),
                ),
                title: Text(
                    people[index].name!
                ),
                subtitle: Text(
                    people[index].institution!
                ),
                subtitleTextStyle: TextStyle(color: fromCssColor("#737373")),
              );
            },
          ),
        ),
      ],
    );
  }
}
