import 'package:flutter/material.dart';
import 'package:from_css_color/from_css_color.dart';

class SubActivities extends StatelessWidget {
  const SubActivities({super.key, required this.color, required this.level});
  final String color;
  final double level;

  @override
  Widget build(BuildContext context) {
    // final double elevation = 7 - (level * 1.5);

    return Positioned(
      top: 0 - (level * 4),
      left: 0 - (level * 5),
      child: Card(
        elevation: 5,
        child: ClipPath(
          clipper: ShapeBorderClipper(
              shape: RoundedRectangleBorder(
                  borderRadius: BorderRadius.circular(8)
              )
          ),
          child: Container(
            height: 100 - (level * 3),
            width: MediaQuery.of(context).size.width - 18,
            decoration: BoxDecoration(
                color: Colors.white,
                border: Border(
                    left: BorderSide(
                        color: fromCssColor(color), width: 7
                    )
                )
            ),
          ),
        ),
      ),
    );
  }
}

// Função para construir múltiplos widgets SubActivities com tamanhos diferentes
List<Widget> buildMultipleSubActivities(String color, int count) {
  List<Widget> subActivitiesList = [];
  for (double i = 1.0; i <= count-1; i++) {
    subActivitiesList.add(
      SubActivities(
        color: color,
        level: i,
      ),
    );
  }
  return subActivitiesList;
}