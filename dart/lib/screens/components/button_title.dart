import 'package:flutter/material.dart';

class TitleButton extends StatelessWidget {
  const TitleButton(
      {super.key, required this.title, required this.color, required this.icon});

  final String title;
  final Color color;
  final IconData icon;

  @override
  Widget build(BuildContext context) {
    return Row(
      mainAxisAlignment: MainAxisAlignment.center,
      children: [
        Icon(
          icon,
          color: color,
          size: 25,
        ),
        Padding(
          padding: const EdgeInsets.all(8.0),
          child: Text(
            title,
            style: TextStyle(color: color),
          ),
        ),
      ],
    );
  }
}