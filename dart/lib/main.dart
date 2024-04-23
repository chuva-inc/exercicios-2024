import 'package:chuva_dart/Home/service/Activities_service.dart';
import 'package:flutter/material.dart';
import "Home/pages/calendar.dart";
import 'package:provider/provider.dart';

void main() {
  runApp(ChangeNotifierProvider(
      create: (context) => ActivitiesService(),
      child: const ChuvaDart())
  );
}

class ChuvaDart extends StatelessWidget {
  const ChuvaDart({super.key});

  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Flutter Demo',
      debugShowCheckedModeBanner: false,
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


