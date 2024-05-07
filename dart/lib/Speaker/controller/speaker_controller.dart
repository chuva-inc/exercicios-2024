
import 'package:intl/intl.dart';

import '../../data/models/activities.dart';

class SpeakerController{
  List<Activities> filteraActivitiesByDay(List<Activities> activities, String speaker){
    return activities.where((activitie) => activitie.people.any((person) => person.name == speaker)).toList();
  }

  String formatData(String data){
    return DateFormat.Hm().format(DateTime.parse(data).toUtc().subtract(const Duration(hours: 3)));
  }

  String gerarIniciais(String nomeCompleto) {
    List<String> partesDoNome = nomeCompleto.split(' ');
    if (partesDoNome.length >= 2) {
      String iniciais =
          partesDoNome[0][0].toUpperCase() + partesDoNome[1][0].toUpperCase();
      return iniciais;
    } else {
      return nomeCompleto[0].toUpperCase();
    }
  }
}