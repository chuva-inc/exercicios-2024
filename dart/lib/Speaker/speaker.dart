import 'package:cached_network_image/cached_network_image.dart';
import 'package:chuva_dart/Home/components/AppBar/app_bar.dart';
import 'package:chuva_dart/Home/components/Schedule/schedule_items.dart';
import 'package:flutter/cupertino.dart';

import 'package:flutter/material.dart';
import 'package:intl/intl.dart';

import '../data/models/activities.dart';
import '../data/models/person.dart';

class Speaker extends StatefulWidget {
  const Speaker(
      {super.key,
      required this.speaker,
      required this.activities,
      required this.listActivities});

  final Person speaker;
  final Activities activities;
  final List<Activities> listActivities;

  @override
  State<Speaker> createState() => _SpeakerState();
}

class _SpeakerState extends State<Speaker> {
  Person get speaker => widget.speaker;
  late String dataFormatada;

  @override
  void initState() {
    super.initState();
    DateTime dataParsed = DateTime.parse(widget.activities.start!);
    dataFormatada = DateFormat("EEE, dd/MM/yyyy", "pt_BR").format(dataParsed);
  }

  String gerarIniciais(String nomeCompleto) {
    List<String> partesDoNome = nomeCompleto.split(' ');
    if (partesDoNome.length >= 2) {
      String iniciais =
          partesDoNome[0][0].toUpperCase() + partesDoNome[1][0].toUpperCase();
      return iniciais;
    } else {
      return nomeCompleto[0].toUpperCase();
    }
  }


  @override
  Widget build(BuildContext context) {
    List<Widget> bioWidgets = [];
    if (speaker.bio?.ptBr?.isNotEmpty == true) {
      bioWidgets.add(
        Container(
          padding: const EdgeInsetsDirectional.only(start: 10),
          alignment: AlignmentDirectional.topStart,
          child: Text(
            "Bio",
            style: Theme.of(context).textTheme.titleLarge,
          ),
        ),
      );
      bioWidgets.add(const SizedBox(height: 5));
      bioWidgets.add(
        Container(
          alignment: AlignmentDirectional.centerStart,
          padding: const EdgeInsetsDirectional.symmetric(horizontal: 5),
          child: Text(
            speaker.bio!.ptBr!,
            textAlign: TextAlign.justify,
            style: Theme.of(context).textTheme.bodySmall,
          ),
        ),
      );
    }

    return Scaffold(
      appBar: const PreferredSize(
          preferredSize: Size.fromHeight(50), child: AppBarCalendar()),
      body: Column(
        children: [
          Row(
            children: [
              Container(
                margin: const EdgeInsetsDirectional.symmetric(
                    vertical: 10, horizontal: 10),
                width: 100,
                height: 100,
                child: ClipRRect(
                  borderRadius: BorderRadius.circular(50),
                  child: CachedNetworkImage(
                    imageUrl: "${speaker.picture}",
                    placeholder: (context, url) =>
                        const CircularProgressIndicator(),
                    imageBuilder: (context, imageProvider) {
                      return Container(
                        decoration: BoxDecoration(
                          image: DecorationImage(
                            image: imageProvider,
                            fit: BoxFit.cover,
                          ),
                        ),
                      );
                    },
                    errorWidget: (context, url, error) => ClipRRect(
                      borderRadius: BorderRadius.circular(50),
                      child: Container(
                        color: Theme.of(context).colorScheme.primary,
                        child: Center(
                            child: Text(gerarIniciais(speaker.name!),
                                style: const TextStyle(
                                    color: Colors.white,
                                    fontSize: 50,
                                    fontWeight: FontWeight.w300))),
                      ),
                    ),
                  ),
                ),
              ),
              Expanded(
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    const SizedBox(
                      height: 10,
                    ),
                    Text(
                      speaker.name!,
                      style: Theme.of(context).textTheme.headlineMedium,
                    ),
                    Text(
                      speaker.institution!,
                      style: Theme.of(context).textTheme.headlineSmall,
                    ),
                  ],
                ),
              ),
            ],
          ),
          ...bioWidgets,
          const SizedBox(
            height: 10,
          ),
          Container(
            padding: const EdgeInsetsDirectional.only(start: 10),
            alignment: AlignmentDirectional.topStart,
            child: Text(
              "Atividades",
              style: Theme.of(context).textTheme.titleLarge,
            ),
          ),
          Container(
            alignment: AlignmentDirectional.centerStart,
            padding: const EdgeInsetsDirectional.only(start: 20),
            child: Text(
                dataFormatada,
              style: Theme.of(context).textTheme.titleMedium,
            ),
          ),
          Expanded(
            child: ListView.separated(
              separatorBuilder: (context, index) => Container(height: 3),
              itemCount: filteraActivitiesByDay(widget.listActivities,speaker.name!).length,
              itemBuilder: (_, index) {
                final item = filteraActivitiesByDay(widget.listActivities,speaker.name!)[index];
               return ScheduleItems(items: item, activities: widget.listActivities,data: "${widget.activities.type.title.ptBr} de ${fomataData(widget.activities.start!)} até ${fomataData(widget.activities.end!)}",);
              },
            ),
          )
        ],
      ),
    );
  }

  List<Activities> filteraActivitiesByDay(List<Activities> activities, String speaker){
    return activities.where((activitie) => activitie.people.any((person) => person.name == speaker)).toList();
  }

  String fomataData(String data){
    return DateFormat.Hm().format(DateTime.parse(data).toUtc().subtract(const Duration(hours: 3)));
  }
}
