

import 'package:get/get.dart';

import '../controller/controller_calendar.dart';

class CalendarHelper implements Bindings {
  @override
  void dependencies() {
    Get.put(CalendarController());
  }
}