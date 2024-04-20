import 'package:flutter/material.dart';
import "Home/calendar.dart";

void main() {
  runApp(const ChuvaDart());
}

class ChuvaDart extends StatelessWidget {
  const ChuvaDart({super.key});

  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Flutter Demo',
      theme: ThemeData(
        appBarTheme: const AppBarTheme(color: Color.fromARGB(255, 69,97,137)),
        colorScheme: ColorScheme.fromSeed(seedColor: const Color.fromARGB(255, 69,97,137),
      ),
        useMaterial3: true,
      ),
      home: const Calendar(),
    );
  }
}


