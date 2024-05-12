
import 'package:flutter/material.dart';

class SubActivitieText extends StatelessWidget {
  const SubActivitieText({super.key, required this.title});
  final String? title;

  @override
  Widget build(BuildContext context) {
    return Container(
      color: Colors.blue,
      padding: const EdgeInsetsDirectional.all(10),
      child: Row(
        children: [
          const Icon(Icons.calendar_month_rounded, color: Colors.white,),
          const SizedBox(width: 5,),
          Expanded(
            child: Container(
              child: Text(
                'Essa Atividade é parte de "$title"',
                style: const TextStyle(color: Colors.white),
              ),
            ),
          ),
        ],
      ),
    );
  }
}
