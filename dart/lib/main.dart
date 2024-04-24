import 'package:chuva_dart/Home/service/activities_service.dart';
import 'package:chuva_dart/routes/routes.dart';
import 'package:flutter/material.dart';
import 'package:from_css_color/from_css_color.dart';
import "Home/pages/calendar.dart";
import 'package:provider/provider.dart';

void main() {
  runApp(const ChuvaDart());
}

class ChuvaDart extends StatelessWidget {
  const ChuvaDart({super.key});

  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp.router(
      title: 'Flutter Demo',
      debugShowCheckedModeBanner: false,
      theme: ThemeData(
        textTheme: const TextTheme(
          titleLarge: TextStyle(
            height: 1.2,
            fontSize: 18,
            fontWeight: FontWeight.w400,
          ),
        ),
        appBarTheme: const AppBarTheme(foregroundColor: Color.fromARGB(255, 69,97,137)),
        tabBarTheme: TabBarTheme(labelColor: fromCssColor("#306dc3")),
        colorScheme: ColorScheme.fromSeed(seedColor: const Color.fromARGB(255, 69,97,137),
      ),
        useMaterial3: true,
      ),
      routerDelegate: routes.routerDelegate,
      routeInformationParser: routes.routeInformationParser,
      routeInformationProvider: routes.routeInformationProvider,
    );
  }
}


