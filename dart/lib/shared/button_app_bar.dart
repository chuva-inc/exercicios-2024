
import 'package:flutter/material.dart';

class ButtonAppBar extends StatelessWidget {
  const ButtonAppBar({super.key});

  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: const EdgeInsets.symmetric(horizontal: 25),
      child: Container(
        padding: const EdgeInsets.only(bottom: 5),
        child: ElevatedButton(
          onPressed: null,
          style: ButtonStyle(
            shape: MaterialStatePropertyAll(RoundedRectangleBorder(borderRadius: BorderRadius.circular(20))),
            backgroundColor: MaterialStateProperty.all(Colors.white),
            padding: MaterialStateProperty.all(const EdgeInsets.symmetric(horizontal: 5.0)),
          ),
          child: Row(
            children: [
              Expanded(
                  child: Container(
                      alignment: AlignmentDirectional.centerStart,
                      child: Container(
                          decoration: BoxDecoration(
                            color: Theme.of(context).tabBarTheme.labelColor,
                            borderRadius: BorderRadius.circular(20.0),
                          ),
                          padding: const EdgeInsets.symmetric(horizontal: 10, vertical: 3),
                          child: const Icon(Icons.calendar_month_outlined, color: Colors.black,size: 27,)
                      ))
              ),
              Expanded(
                flex: 6,
                child: Container(
                  alignment: AlignmentDirectional.center,
                  margin: const EdgeInsets.only(right: 15),
                  // color: Colors.red,
                  child: const Text(
                    "Exibindo todas atividades",
                    style: TextStyle(
                        color: Colors.black
                    ),
                  ),
                ),
              )
            ],
          ),
        ),
      ),
    );
  }
}
