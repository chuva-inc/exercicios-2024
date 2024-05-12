import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:from_css_color/from_css_color.dart';

class SubActivities extends StatelessWidget {
  const SubActivities({super.key, required this.color, required this.level});
  final String color;
  final double level;

  @override
  Widget build(BuildContext context) {

    return Card(
      elevation: 5,
      child: ClipPath(
        clipper: ShapeBorderClipper(
            shape: RoundedRectangleBorder(
                borderRadius: BorderRadius.circular(5)
            )
        ),
        child: Container(
          height: 100 - (level * 4),
          width: MediaQuery.of(context).size.width - 24,

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
    );
  }
}

List<Widget> buildMultipleSubActivities(String color, int count) {
  List<Widget> subActivitiesList = [];
  double maxPaddingStart = 10.0;
  double paddingDecrement = maxPaddingStart / (count - 1);
  for (int i = 1; i <= count; i++) {
    double currentPaddingStart = maxPaddingStart - paddingDecrement * (i - 2.5);
    currentPaddingStart = currentPaddingStart > 0 ? currentPaddingStart : 0;
    subActivitiesList.add(
      Padding(
        padding: EdgeInsetsDirectional.only(top: 20, start: currentPaddingStart,end: 7),
        child: SubActivities(
          color: color,
          level: i.toDouble(),
        ),
      ),
    );
  }
  return subActivitiesList;
}
