import 'dart:convert';

import 'package:chuva_dart/data/models/activities.dart';
import 'package:hive/hive.dart';

class ActivitiesHiveAdapter extends TypeAdapter<Activities>{
  @override
  final typeId = 0;

  @override
  Activities read(BinaryReader reader) {
    var jsonString = reader.readString();
    return Activities.fromJson(json.decode(jsonString) as Map<String, dynamic>);
  }

  @override
  void write(BinaryWriter writer, Activities obj) {
    var jsonString = json.encode(obj.toJson());
    writer.writeString(jsonString);
  }
}
