// ignore_for_file: use_super_parameters

import 'package:flutter/material.dart';
import 'package:from_css_color/from_css_color.dart';
import 'package:get/get.dart';
import 'package:go_router/go_router.dart';

import '../theme/theme.dart';
import 'author_view/card_author.dart';
import 'calendar/controller/controller_calendar.dart';
import 'components/button.dart';
import 'components/content_text.dart';
import 'calendar/components/card_paper.dart';

class Activity extends StatefulWidget {
  const Activity({Key? key}) : super(key: key);

  @override
  State<Activity> createState() => _ActivityState();
}

class _ActivityState extends State<Activity> {
  final CalendarController _controller = Get.find<CalendarController>();

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        leading: BackButton(
          color: ThemeColor.white,
          onPressed: () {
            context.go("/");
          },
        ),
        centerTitle: true,
        backgroundColor: ThemeColor.darkBlue,
        title: Padding(
          padding: const EdgeInsets.only(top: 15.0),
          child: Text(
            'Chuva ❤️ Flutter',
            style: TextStyle(color: ThemeColor.white),
          ),
        ),
      ),
      body: SingleChildScrollView(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Container(
              color: fromCssColor(_controller.color),
              height: 35,
              width: double.infinity,
              alignment: Alignment.center,
              child: Text(
                _controller.category,
                style: TextStyle(color: ThemeColor.white),
              ),
            ),
            Padding(
              padding: const EdgeInsets.all(8.0),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  Text(
                    _controller.title,
                    textAlign: TextAlign.center,
                    style: const TextStyle(fontWeight: FontWeight.bold, fontSize: 20),
                  ),
                  const SizedBox(height: 8.0),
                  TextInfo(title: _controller.info, icon: Icons.query_builder),
                  TextInfo(title: _controller.local, icon: Icons.location_on),
                  const ButtonFav(),
                  const SizedBox(height: 8.0),
                  Text(_controller.desc),
                  if (_controller.subactivities.isNotEmpty) ...[
                    const SizedBox(height: 16.0),
                    Text(
                      "Sub-atividades",
                      style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold, color: ThemeColor.gray),
                    ),
                    const SizedBox(height: 8.0),
                    ListView.builder(
                      physics: const NeverScrollableScrollPhysics(),
                      shrinkWrap: true,
                      itemCount: _controller.subactivities.length,
                      itemBuilder: (context, index) {
                        final item = _controller.subactivities[index];
                        return CardPaper(
                          item: item,
                          title: item.title.ptBr ?? "",
                          color: item.category.color ?? "red",
                          info: "${item.type.title.ptBr} de ${_controller.formatTime(item.start)} até ${_controller.formatTime(item.end)}",
                          author: _controller.formatAuthor(item.people),
                        );
                      },
                    ),
                  ],
                  if (_controller.authors.isNotEmpty) ...[
                    const SizedBox(height: 16.0),
                    ListView.builder(
                      physics: const NeverScrollableScrollPhysics(),
                      shrinkWrap: true,
                      itemCount: _controller.authors.length,
                      itemBuilder: (context, index) {
                        final item = _controller.authors[index];
                        return CardAuthor(
                          onTap: () {
                            context.go('/author');
                            _controller.author = item;
                            _controller.getActivitiesAuthor();
                          },
                          isAuthorPage: false,
                          id: item.id,
                          name: item.name,
                          institution: item.institution ?? "",
                          image: item.picture ?? "",
                        );
                      },
                    ),
                  ],
                ],
              ),
            ),
          ],
        ),
      ),
    );
  }
}
