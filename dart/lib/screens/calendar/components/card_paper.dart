
// ignore_for_file: use_super_parameters

import 'package:auto_size_text/auto_size_text.dart';
import 'package:flutter/material.dart';
import 'package:from_css_color/from_css_color.dart';
import 'package:get/get.dart';
import 'package:go_router/go_router.dart';

import '../../../models/data_model.dart';
import '../../../theme/theme.dart';
import '../controller/controller_calendar.dart';

class CardPaper extends StatelessWidget {
  
  const CardPaper(
      {Key? key,
      required this.title,
      this.author,
      required this.info,
      required this.color,
      required this.item})
      : super(key: key);

  final String title;
  final String color;
  final String info;
  final String? author;
  final Data item;

  @override
  Widget build(BuildContext context) {
    final controller = Get.put(CalendarController());

    return GestureDetector(
      onTap: () => {
        context.go("/activity"),
        controller.getInfoPaper(item),
        controller.paper = item,
        controller.getSubActivities(item.id)
      },
      child: Stack(
        children: [
          if (item.id == controller.mapSubactivities["idParent"]) ...[
            Positioned(
              top: 7,
              left: 7,
              child: Card(
                elevation: 2,
                child: ClipPath(
                  clipper: ShapeBorderClipper(
                      shape: RoundedRectangleBorder(
                          borderRadius: BorderRadius.circular(5))),
                  child: Container(
                    height: 100,
                    width: MediaQuery.sizeOf(context).width - 15,
                    decoration: BoxDecoration(
                        border: Border(
                            left: BorderSide(
                                color: fromCssColor(color), width: 5))),
                  ),
                ),
              ),
            ),
            Positioned(
              top: 4,
              left: 3,
              child: Card(
                elevation: 2,
                child: ClipPath(
                  clipper: ShapeBorderClipper(
                      shape: RoundedRectangleBorder(
                          borderRadius: BorderRadius.circular(5))),
                  child: Container(
                    height: 100,
                    width: MediaQuery.sizeOf(context).width - 10,
                    decoration: BoxDecoration(
                        border: Border(
                            left: BorderSide(
                                color: fromCssColor(color), width: 5))),
                  ),
                ),
              ),
            ),
          ],
          Padding(
            padding: const EdgeInsets.symmetric(vertical: 2.0),
            child: Card(
              elevation: 2,
              color: fromCssColor("white"),
              child: ClipPath(
                clipper: ShapeBorderClipper(
                    shape: RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(5))),
                child: Container(
                  height: 100,
                  decoration: BoxDecoration(
                      border: Border(
                          left: BorderSide(
                              color: fromCssColor(color), width: 5))),
                  child: Padding(
                    padding: const EdgeInsets.only(left: 15.0),
                    child: Row(
                      children: [
                        Expanded(
                          child: Column(
                              mainAxisAlignment: MainAxisAlignment.center,
                              crossAxisAlignment: CrossAxisAlignment.start,
                              children: [
                                Text(
                                  info,
                                  style: const TextStyle(fontSize: 11),
                                ),
                                Padding(
                                  padding: const EdgeInsets.only(top: 2.0),
                                  child: AutoSizeText(
                                    title,
                                    maxLines: 2,
                                    minFontSize: 18,
                                    overflow: TextOverflow.ellipsis,
                                    style: const TextStyle(
                                      fontSize: 18,
                                      height: 1.2,
                                    ),
                                  ),
                                ),
                                AutoSizeText(
                                  author ?? "",
                                  maxLines: 1,
                                  minFontSize: 14,
                                  overflow: TextOverflow.ellipsis,
                                  style: TextStyle(
                                      fontSize: 14,
                                      color: fromCssColor('grey')),
                                )
                              ]),
                        ),
                        Visibility(
                          visible: controller.isFavorite(item.id),
                          child: Padding(
                            padding: const EdgeInsets.only(top: 8.0),
                            child: Column(
                              mainAxisAlignment: MainAxisAlignment.start,
                              children: [
                                Icon(
                                  Icons.bookmark,
                                  color: ThemeColor.gray,
                                )
                              ],
                            ),
                          ),
                        )
                      ],
                    ),
                  ),
                ),
              ),
            ),
          ),
        ],
      ),
    );
  }
}