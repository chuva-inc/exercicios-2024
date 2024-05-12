
import 'package:flutter/material.dart';

class TabItem extends StatelessWidget {
  final String title;


  const TabItem({super.key, required this.title});


  @override
  Widget build(BuildContext context) {
    return Container(
      alignment: Alignment.centerLeft,
      child: Tab(
        child: Text(
          title,
          style: const TextStyle(
            fontSize: 17
          ),
        ),
      ),
    );
    // Container(
  }
}
