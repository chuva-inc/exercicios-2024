
import 'package:chuva_dart/data/models/activities.dart';
import 'package:flutter/material.dart';

class ListRole extends StatefulWidget {
  const ListRole({super.key, required this.activities});
  final Activities activities;

  @override
  State<ListRole> createState() => _ListRoleState();
}

class _ListRoleState extends State<ListRole> {
  late String titles;

  @override
  void initState() {
    super.initState();
    extractTitles();
  }

  void extractTitles() {
    for (var person in widget.activities.people) {
      if (person.role!.label.ptBr == 'Moderador') {
        titles = 'Moderador';
      } else if (person.role!.label.ptBr == 'Palestrante') {
        titles == 'Palestrante';
      }
    }
  }

  @override
  Widget build(BuildContext context) {
    return const Placeholder();
  }
}
