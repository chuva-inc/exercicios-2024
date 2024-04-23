
import 'package:chuva_dart/Home/components/TabBar/tab_item.dart';
import 'package:flutter/material.dart';

class Tab_Bar extends StatelessWidget {
  const Tab_Bar({super.key});

  @override
  Widget build(BuildContext context) {
    return const SizedBox(
      height: 60,
      child: TabBar(
        isScrollable: true,
          tabAlignment: TabAlignment.start,
         indicatorSize: TabBarIndicatorSize.tab,
          dividerColor: Colors.transparent,
          indicator: BoxDecoration(
            border: Border(bottom: BorderSide(color: Colors.black26, width: 3))
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
