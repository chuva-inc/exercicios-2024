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

  // @override
  // Activities read(BinaryReader reader) {
  //   return Activities(
  //       role: reader.read(),
  //       name: reader.readString(),
  //       favorite: reader.readBool(),
  //       picture: reader.readString(),
  //       bio: reader.read(),
  //       institution: reader.readString(),
  //       id: reader.readInt(),
  //       changed: reader.readInt(),
  //       start: reader.readString(),
  //       end: reader.readString(),
  //       title: reader.read(),
  //       description: reader.read(),
  //       category: reader.read(),
  //       locations: reader.read(),
  //       type: reader.read(),
  //       papers: reader.read(),
  //       people: reader.read(),
  //       status: reader.readInt(),
  //       weight: reader.readInt(),
  //       addons: reader.readString(),
  //       parent: reader.readInt(),
  //       event: reader.readString(),
  //   );
  // }
  //
  // @override
  // void write(BinaryWriter writer, Activities obj) {
  //   writer.writeString(obj.name!);
  //   writer.writeString(obj.end!);
  //   writer.writeString(obj.start!);
  //   writer.writeInt(obj.id);
  //   writer.writeInt(obj.status);
  //   writer.writeInt(obj.weight);
  //   writer.writeBool(obj.favorite!);
  //   writer.write(obj.title);
  //   writer.write(obj.category);
  //   writer.write(obj.description);
  //   writer.write(obj.bio);
  //   writer.write(obj.type);
  //   writer.write(obj.locations);
  //   writer.write(obj.papers);
  //   writer.write(obj.people);
  //   writer.writeString(obj.addons!);
  //   writer.writeString(obj.event!);
  //   writer.writeString(obj.institution!);
  //   writer.writeInt(obj.changed!);
  //   writer.writeString(obj.picture!);
  //   writer.write(obj.role!);
  // }
}
