
import 'package:chuva_dart/Home/components/TabBar/tab_item.dart';
import 'package:flutter/material.dart';

class Tab_Bar extends StatelessWidget {
  const Tab_Bar({super.key});

  @override
  Widget build(BuildContext context) {
    return const SizedBox(
      // alignment: Alignment.centerLeft,
      height: 60,
      // color: Theme.of(context).colorScheme.primary.withRed(48).withGreen(109).withBlue(195),
      child: TabBar(
        isScrollable: true,
          tabAlignment: TabAlignment.start,
          // tabAlignment: TabAlignment.fill,
         indicatorSize: TabBarIndicatorSize.tab,
        // indicatorPadding: EdgeInsets.only(left: 0),
        // labelPadding: EdgeInsets.only(left: 0),
          // padding: EdgeInsets.only(right: 100),
          dividerColor: Colors.transparent,
          indicator: BoxDecoration(
            //color: Theme.of(context).colorScheme.primary.withRed(48).withGreen(109).withBlue(195),
            border: Border(bottom: BorderSide(color: Colors.black26, width: 3))
            // borderRadius: BorderRadius.all(Radius.circular(10)),
          ),
          labelColor: Colors.white,
          unselectedLabelColor: Colors.white54,
          tabs: [
            TabItem(title: '26'),
            TabItem(title: '27'),
            TabItem(title: '28'),
            TabItem(title: '29'),
            TabItem(title: '30'),
          ],
      ),
    );
  }
}
