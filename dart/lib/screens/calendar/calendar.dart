// ignore_for_file: use_super_parameters

import 'package:flutter/material.dart';
import 'package:from_css_color/from_css_color.dart';
import 'package:get/get.dart';

import 'controller/controller_calendar.dart';
import 'components/calendar_bar.dart';
import 'components/card_paper.dart';

class Calendar extends StatefulWidget {
  const Calendar({Key? key}) : super(key: key);

  @override
  State<Calendar> createState() => _CalendarState();
}

class _CalendarState extends State<Calendar> {
  final CalendarController _controller = Get.put(CalendarController());

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        centerTitle: true,
        backgroundColor: fromCssColor("#456189"),
        toolbarHeight: 130,
        title: const Padding(
          padding: EdgeInsets.only(top: 15.0),
          child: Text(
            'Chuva ❤️ Flutter',
            style: TextStyle(color: Colors.white),
          ),
        ),
        bottom: PreferredSize(
          preferredSize: const Size.fromHeight(80),
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              Text(
                "Programação",
                style: TextStyle(fontSize: 20, color: Colors.grey[300]),
              ),
              const SizedBox(height: 10),
              Padding(
                padding: const EdgeInsets.symmetric(horizontal: 20.0),
                child: Container(
                  height: 50,
                  width: double.infinity,
                  decoration: BoxDecoration(
                    borderRadius: BorderRadius.circular(30),
                    color: Colors.white,
                  ),
                  child: Row(
                    children: [
                      Padding(
                        padding: const EdgeInsets.all(5.0),
                        child: Container(
                          height: 40,
                          width: 50,
                          decoration: BoxDecoration(
                            borderRadius: BorderRadius.circular(30),
                            color: fromCssColor("#306dc3"),
                          ),
                          child: const Icon(Icons.calendar_today, color: Colors.black),
                        ),
                      ),
                      const SizedBox(width: 10),
                      const Text("Exibindo todas atividades", style: TextStyle(color: Colors.black)),
                    ],
                  ),
                ),
              ),
            ],
          ),
        ),
      ),
      body: Obx(() {
        return Column(
          children: [
            const CalendarBar(),
            Expanded(
              child: ListView.builder(
                itemCount: _controller.filteredList.length,
                itemBuilder: (BuildContext context, int index) {
                  final item = _controller.filteredList[index];
                  _controller.getSubActivities(item.id);
                  return CardPaper(
                    item: item,
                    title: item.title.ptBr ?? "",
                    color: item.category.color ?? "red",
                    info: "${item.type.title.ptBr} de ${_controller.formatTime(item.start)} até ${_controller.formatTime(item.end)}",
                    author: _controller.formatAuthor(item.people),
                  );
                },
              ),
            ),
          ],
        );
      }),
    );
  }
}
