

import 'package:chuva_dart/Home/components/Schedule/components/schedule_list_view.dart';
import 'package:chuva_dart/Home/controllers/activities_controller.dart';
import 'package:chuva_dart/data/models/person.dart';
import 'package:from_css_color/from_css_color.dart';
import 'package:chuva_dart/data/stores/activities_store.dart';
import 'package:flutter/material.dart';



class Schedule extends StatefulWidget {
  const Schedule({super.key});

  @override
  State<Schedule> createState() => _ScheduleState();
}

class _ScheduleState extends State<Schedule> {

  final ActivitiesStore activitiesStore =
      ActivitiesStore(controller: ActivitiesController());


  @override
  void initState() {
    super.initState();
    activitiesStore.getActivities();
  }

  @override
  Widget build(BuildContext context) {
    return AnimatedBuilder(
        animation: Listenable.merge([
          activitiesStore.isLoading,
          activitiesStore.erro,
          activitiesStore.state,
        ]),
        builder: (BuildContext context, Widget? child) {
          if (activitiesStore.isLoading.value) {
            return Column(
              mainAxisSize: MainAxisSize.min,
              children: [
                Flexible(
                    child: Container(
                        alignment: AlignmentDirectional.center,
                        height: MediaQuery.of(context).size.height,
                        child: const CircularProgressIndicator())),
              ],
            );
          }
          if (activitiesStore.erro.value.isNotEmpty) {
            return Column(
              mainAxisSize: MainAxisSize.min,
              children: [
                Flexible(
                  child: Container(
                    alignment: AlignmentDirectional.center,
                    height: MediaQuery.of(context).size.height,
                    child: const Text(
                      'Erro ao carregar as atividades',
                      style: TextStyle(
                        color: Colors.black54,
                        fontWeight: FontWeight.w600,
                        fontSize: 20,
                      ),
                      textAlign: TextAlign.center,
                    ),
                  ),
                ),
              ],
            );
          } else {
            return
              ListView.separated(
                separatorBuilder: (context, index) => Container(
                  height: 5,
                ),
                itemCount: activitiesStore.state.value.length,
                itemBuilder: (_, index) {
                  final items = activitiesStore.state.value.elementAt(index);
                  return Column(
                    children: [
                      Padding(
                        padding: const EdgeInsets.only(left: 10, right: 10, top: 10),
                        child: Material(
                          elevation: 5,
                          borderRadius: BorderRadius.circular(5),
                          child: InkWell(
                            onTap: () {},
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
                                        width: 10,
                                      ),
                                    ),
                                  ),
                                  Padding(
                                    padding: const EdgeInsets.only(left: 20),
                                    child: ListTile(
                                      minVerticalPadding: 10,
                                      subtitle: Container(
                                        alignment: AlignmentDirectional.centerStart,
                                        child: Text(
                                          "${formataPalestrantes(items.people)}",
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
                                          // Text("${items.}")
                                        ],
                                      ),
                                    ),
                                  ),
                                ],
                              ),
                            ),
                          ),
                        ),
                      ),
                    ],
                  );

                });
          }
        });
  }

  String formataPalestrantes(List<Person> people){
    return people.map((person) => person.name).join(", ");
  }

  String fomataData(String start, String end){

    String startTime = start.substring(11, 16);
    String endTime = end.substring(11, 16);

    return '$startTime até $endTime';
  }
}
