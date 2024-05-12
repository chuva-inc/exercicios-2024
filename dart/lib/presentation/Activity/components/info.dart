
import 'package:chuva_dart/data/models/activities.dart';
import 'package:flutter/material.dart';

class Info extends StatelessWidget {
  const Info({super.key, required this.formattedTime, required this.activities});
  final String formattedTime;
  final Activities activities;

  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: const EdgeInsetsDirectional.only(start: 10),
      child: Column(
        children: [
          Row(
            children: [
              Icon(
                Icons.watch_later_outlined,
                color: Theme.of(context).colorScheme.primary,
                size: 15,
              ),
              const SizedBox(
                width: 5,
              ),
              Text(
                formattedTime,
                style: Theme.of(context).textTheme.titleSmall,
              ),
            ],
          ),
          Row(
            children: [
              Icon(
                Icons.location_on_sharp,
                color: Theme.of(context).colorScheme.primary,
                size: 15,
              ),
              const SizedBox(
                width: 5,
              ),
              Text(
                activities.locations.first.title!.ptBr!,
                style: Theme.of(context).textTheme.titleSmall,
              )
            ],
          ),
        ],
      ),
    );
  }
}
