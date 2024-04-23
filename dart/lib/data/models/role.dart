

import 'package:json_annotation/json_annotation.dart';

import 'package:chuva_dart/data/models/description.dart';

part 'role.g.dart';

@JsonSerializable()
class Role {
  int id;
  Description label;

  Role({
    required this.id,
    required this.label,
  });

  factory Role.fromJson(Map<String, dynamic> json) => _$RoleFromJson(json);
  Map<String, dynamic> toJson() => _$RoleToJson(this);

}